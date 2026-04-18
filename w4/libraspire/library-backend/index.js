const express = require("express");
const cors = require("cors");

const app = express();

app.use(cors());
app.use(express.json());

// routes
app.use("/api/auth", require("./routes/auth.routes"));
app.use("/api/books", require("./routes/book.routes"));
app.use("/api/borrow", require("./routes/borrow.routes"));
app.use("/api/categories", require("./routes/category.routes"));
app.use("/api/contact", require("./routes/contact.routes"));
app.use("/api/users", require("./routes/user.routes"));

app.listen(3000, () => {
  console.log("Server running on port 3000");
});