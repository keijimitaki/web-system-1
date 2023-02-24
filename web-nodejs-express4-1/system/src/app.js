//const PORT = process.env.PORT

const PORT = 3000
const HOST = '0.0.0.0';
const express = require("express");
const app = express();

app.get("/",(req, res) => {
  res.end("Hello Express");
});

app.listen(PORT, HOST, () => {
  console.log(`Application listening on http://${HOST}:${PORT}`);
});

