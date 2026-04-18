const { Pool } = require("pg");

const pool = new Pool({
  user: "libraspire_user",
  host: "localhost",
  database: "libraspire",
  password: "1234",
  port: 5432,
});

module.exports = pool;