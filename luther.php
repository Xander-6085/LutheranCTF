<!DOCTYPE html>
<html>

<head>
  <title>Martin Luther's 95 PHPs</title>
  <script src="scripts/luther-calc.js"></script>
</head>

<style>
  body {
    background-image: url("static/martin_luther_background.jpg");
    background-size: 150px;
  }

  #mirror_gandhi {
    width: 500px;
    height: auto;
    margin-left: 150px;
    margin-right: 75px;
    margin-top: 75px;
  }

  .container {
    display: grid;
    align-items: center;
    grid-template-columns: 1fr 1fr 1fr;
    column-gap: 5px;
  }


  @font-face {
    font-family: Papyrus;
    src: url("static/papyrus/papyrus.ttf");
  }

  #martin_luther_text {
    font-size: 2rem;
    font-family: Papyrus;
    color: white;
  }

  a {
    color: white;
  }
</style>
<body>
  <div class='container'>
    <img src='static/martin_luther.jpg' id='mirror_gandhi'>
    <span>
  <h1>95 Reasons to hate PHP</h1>
  <p id='martin_luther'>
    <label for="input">Input digits (don't use scientific notation):</label>
    <input type="number" id="input">
  </p>
  <p>
    <label for="desired">Digits must equal this string in PHP:</label>
    <input type="text" id="desired" value="2e3">
  </p>
  <button id="submit-calc">Check Answer</button>
  <h2 id="response"></h2>
  </span>
  </div>
</body>

</html>
