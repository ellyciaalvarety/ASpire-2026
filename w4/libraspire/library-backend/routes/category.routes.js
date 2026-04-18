const router = require("express").Router();
const pool = require("../config/db");

// GET ALL
router.get("/", async (req, res) => {
  const result = await pool.query("SELECT * FROM categories");
  res.json(result.rows);
});

// ADD CATEGORY
router.post("/", async (req, res) => {
  const { name } = req.body;

  await pool.query(
    "INSERT INTO categories (name) VALUES ($1)",
    [name]
  );

  res.json({ message: "Category added" });
});

module.exports = router;