const pool = require("./config/db");

pool.query("SELECT NOW()", (err, res) => {
  if (err) {
    console.log("ERROR CONNECT DB:", err);
  } else {
    console.log("DATABASE CONNECTED:", res.rows);
  }
});