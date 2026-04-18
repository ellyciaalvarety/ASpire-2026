const router = require("express").Router();
const pool = require("../config/db");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
require("dotenv").config();

// REGISTER
router.post("/register", async (req, res) => {
  const { name, email, password } = req.body;

  try {
    const hash = await bcrypt.hash(password, 10);

    await pool.query(
      "INSERT INTO users (name, email, password, role) VALUES ($1,$2,$3,'member')",
      [name, email, hash]
    );

    res.json({ message: "User registered" });
  } catch (err) {
    res.status(500).json(err.message);
  }
});

// LOGIN
router.post("/login", async (req, res) => {
  const { email, password } = req.body;

  try {
    const user = await pool.query(
      "SELECT * FROM users WHERE email=$1",
      [email]
    );

    if (user.rows.length === 0)
      return res.status(404).json({ message: "User not found" });

    const valid = await bcrypt.compare(password, user.rows[0].password);

    if (!valid)
      return res.status(401).json({ message: "Wrong password" });

    const token = jwt.sign(
      {
        id: user.rows[0].id,
        role: user.rows[0].role,
      },
      process.env.JWT_SECRET,
      { expiresIn: "1d" }
    );

    res.json({
      message: "Login success",
      token,
      user: {
        id: user.rows[0].id,
        name: user.rows[0].name,
        role: user.rows[0].role,
      },
    });

  } catch (err) {
    res.status(500).json(err.message);
  }
});

module.exports = router;