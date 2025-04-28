<!DOCTYPE html>
<html>

<head>
  <title>Luther</title>
  <script src="scripts/luther-calc.js"></script>
</head>

<body>
  <h1>Calculator:</h1>
  <p>
    <label for="input">Input digits (don't use scientific notation):</label>
    <input type="number" id="input">
  </p>
  <p>
    <label for="desired">Digits must equal this string in PHP:</label>
    <input type="text" id="desired" value="2e3">
  </p>
  <button id="submit-calc">Check Answer</button>
  <h2 id="response"></h2>
</body>

</html>
