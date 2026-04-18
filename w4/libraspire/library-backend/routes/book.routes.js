const router = require("express").Router();
const pool = require("../config/db");

const auth = require("../middleware/auth.middleware");
const role = require("../middleware/role.middleware");

// GET ALL BOOKS
router.get("/", async (req, res) => {
  try {
    const result = await pool.query(`
      SELECT books.*, categories.name AS category_name
      FROM books
      LEFT JOIN categories ON books.category_id = categories.id
    `);

    res.json(result.rows);
  } catch (err) {
    res.status(500).json(err.message);
  }
});

// GET DETAIL
router.get("/:id", async (req, res) => {
  const result = await pool.query(
    "SELECT * FROM books WHERE id=$1",
    [req.params.id]
  );

  res.json(result.rows[0]);
});

// ADD BOOK (ADMIN ONLY)
router.post("/", auth, role("admin"), async (req, res) => {
  const { title, author, description, isbn, synopsis, cover, stock, category_id } = req.body;

  try {
    await pool.query(
      `INSERT INTO books 
      (title, author, description, isbn, synopsis, cover, stock, category_id)
      VALUES ($1,$2,$3,$4,$5,$6,$7,$8)`,
      [title, author, description, isbn, synopsis, cover, stock, category_id]
    );

    res.json({ message: "Book added" });
  } catch (err) {
    res.status(500).json(err.message);
  }
});

// UPDATE
router.put("/:id", auth, role("admin"), async (req, res) => {
  const { title, author, stock } = req.body;

  await pool.query(
    "UPDATE books SET title=$1, author=$2, stock=$3 WHERE id=$4",
    [title, author, stock, req.params.id]
  );

  res.json({ message: "Book updated" });
});

// DELETE
router.delete("/:id", auth, role("admin"), async (req, res) => {
  await pool.query(
    "DELETE FROM books WHERE id=$1",
    [req.params.id]
  );

  res.json({ message: "Book deleted" });
});

module.exports = router;