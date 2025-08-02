<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Test Colores</title>
  <style>
    body {
      font-family: sans-serif;
      padding: 20px;
    }

    #grupoRadio input[type="radio"] {
      display: none;
    }

    #grupoRadio label.circu {
      display: inline-block;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-right: 8px;
      border: 2px solid #ccc;
      cursor: pointer;
    }

    #grupoRadio input[type="radio"]:checked + label.circu {
      border: 3px solid #000;
    }
  </style>
</head>
<body>

<h3>Selecciona un color:</h3>
<div id="grupoRadio">
  <input type="radio" name="color_evento" id="orange" value="#FF5722" checked>
  <label for="orange" class="circu" style="background-color: #FF5722;"></label>

  <input type="radio" name="color_evento" id="amber" value="#FFC107">
  <label for="amber" class="circu" style="background-color: #FFC107;"></label>

  <input type="radio" name="color_evento" id="lime" value="#8BC34A">
  <label for="lime" class="circu" style="background-color: #8BC34A;"></label>

  <input type="radio" name="color_evento" id="teal" value="#009688">
  <label for="teal" class="circu" style="background-color: #009688;"></label>

  <input type="radio" name="color_evento" id="blue" value="#2196F3">
  <label for="blue" class="circu" style="background-color: #2196F3;"></label>

  <input type="radio" name="color_evento" id="indigo" value="#9c27b0">
  <label for="indigo" class="circu" style="background-color: #9c27b0;"></label>
</div>

</body>
</html>
