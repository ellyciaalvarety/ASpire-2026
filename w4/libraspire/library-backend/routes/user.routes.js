const router = require("express").Router();
const pool = require("../config/db");
const bcrypt = require("bcrypt");

const auth = require("../middleware/auth.middleware");
const role = require("../middleware/role.middleware");


// ==========================
// GET ALL USERS (ADMIN)
// ==========================
router.get("/", auth, role("admin"), async (req, res) => {
  try {
    const result = await pool.query(
      "SELECT id, name, email, role, created_at FROM users"
    );

    res.json(result.rows);
  } catch (err) {
    res.status(500).json(err.message);
  }
});


// ==========================
// GET USER BY ID
// ==========================
router.get("/:id", auth, async (req, res) => {
  try {
    const result = await pool.query(
      "SELECT id, name, email, role, created_at FROM users WHERE id=$1",
      [req.params.id]
    );

    res.json(result.rows[0]);
  } catch (err) {
    res.status(500).json(err.message);
  }
});


// ==========================
// CREATE USER (ADMIN)
// ==========================
router.post("/", auth, role("admin"), async (req, res) => {
  const { name, email, password, role: userRole } = req.body;

  try {
    const hash = await bcrypt.hash(password, 10);

    await pool.query(
      `INSERT INTO users (name, email, password, role)
       VALUES ($1,$2,$3,$4)`,
      [name, email, hash, userRole || "member"]
    );

    res.json({ message: "User added" });
  } catch (err) {
    res.status(500).json(err.message);
  }
});


// ==========================
// UPDATE ROLE (ADMIN)
// ==========================
router.put("/role/:id", auth, role("admin"), async (req, res) => {
  const { role } = req.body;

  try {
    await pool.query(
      `UPDATE users SET role=$1 WHERE id=$2`,
      [role, req.params.id]
    );

    res.json({ message: "Role updated" });
  } catch (err) {
    res.status(500).json(err.message);
  }
});


// ==========================
// UPDATE PROFILE (USER)
// ==========================
router.put("/:id", auth, async (req, res) => {
  const { name, email } = req.body;

  try {
    await pool.query(
      `UPDATE users 
       SET name=$1, email=$2 
       WHERE id=$3`,
      [name, email, req.params.id]
    );

    res.json({ message: "Profile updated" });
  } catch (err) {
    res.status(500).json(err.message);
  }
});


// ==========================
// DELETE USER (ADMIN)
// ==========================
router.delete("/:id", auth, role("admin"), async (req, res) => {
  try {
    await pool.query(
      "DELETE FROM users WHERE id=$1",
      [req.params.id]
    );

    res.json({ message: "User deleted" });
  } catch (err) {
    res.status(500).json(err.message);
  }
});

module.exports = router;