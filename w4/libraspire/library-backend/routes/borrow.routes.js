const router = require("express").Router();
const pool = require("../config/db");

const auth = require("../middleware/auth.middleware");
const role = require("../middleware/role.middleware");

// ==========================
// AJUKAN PINJAM (MEMBER)
// ==========================
router.post("/", auth, role("member"), async (req, res) => {
  const { user_id, book_id } = req.body;

  try {
    await pool.query(
      `INSERT INTO borrow (user_id, book_id, status, borrow_date)
       VALUES ($1,$2,'waiting',NOW())`,
      [user_id, book_id]
    );

    res.json({ message: "Borrow request sent" });
  } catch (err) {
    res.status(500).json(err.message);
  }
});


// ==========================
// ADMIN UPDATE STATUS
// ==========================
router.put("/:id/status", auth, role("admin"), async (req, res) => {
  const { status } = req.body;

  try {
    await pool.query(
      `UPDATE borrow SET status=$1 WHERE id=$2`,
      [status, req.params.id]
    );

    res.json({ message: "Status updated" });
  } catch (err) {
    res.status(500).json(err.message);
  }
});


// ==========================
// HISTORY USER
// ==========================
router.get("/user/:id", auth, async (req, res) => {
  try {
    const result = await pool.query(
      `SELECT borrow.*, books.title
       FROM borrow
       JOIN books ON borrow.book_id = books.id
       WHERE user_id=$1`,
      [req.params.id]
    );

    res.json(result.rows);
  } catch (err) {
    res.status(500).json(err.message);
  }
});

module.exports = router;