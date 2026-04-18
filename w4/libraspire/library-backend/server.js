const express = require("express");
const cors = require("cors");

const app = express();

// middleware
app.use(cors());
app.use(express.json());

// test route
app.get("/", (req, res) => {
  res.send("API Libraspire running 🚀");
});

// contoh route auth (kalau sudah ada)
const authRoutes = require("./routes/auth.routes");
app.use("/api/auth", authRoutes);

// jalankan server
app.listen(3000, () => {
  console.log("Server running on port 3000");
});