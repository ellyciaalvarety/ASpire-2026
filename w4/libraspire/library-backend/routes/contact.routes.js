const router = require("express").Router();
const pool = require("../config/db");

// SEND MESSAGE
router.post("/", async (req, res) => {
  const { user_id, message } = req.body;

  await pool.query(
    "INSERT INTO contact_messages (user_id, message) VALUES ($1,$2)",
    [user_id, message]
  );

  res.json({ message: "Message sent" });
});

module.exports = router;