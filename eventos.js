<!--
var current = 0
var x = 0
var speed = 20
var speed2 = 2000
function initArray(n) {
  this.length = n;
  for (var i =1; i <= n; i++) {
    this[i] = ' '
 }
}
typ = new initArray(12)
typ[0]=" •••   *****   MD EQUIPAMIENTOS   *****  "
typ[1]=" •••  ** Alquiler de Sillones - Alquiler de Living **"
typ[2]=" ••• ****  Sillones para Fiestas - Sillones para Eventos  ****  "
typ[3]=" •••   ***  Alquiler de Mesas – Alquiler de Sillas  ***"
typ[4]=" •••    *****   Sillones Clasicos - Sillones de Estilo   *****"
typ[5]=" •••   *****     Juegos de Living - Juegos de Sillones     ***** "
typ[6]=" •••   **  Sillones para Casamientos - Sillones para Cumpleaños  *** "
typ[7]=" •••   ***  Alquiler de Puffs - Alquiler de Mesas Ratonas   **  "
typ[8]=" •••   ***  Living para Salones - Sillones para Salones  *** "
function typewrite() {
var m = typ[current]
window.status = m.substring(0, x++) + "•••••••"
if (x == m.length + 1) {
x = 0
current++
if (current > typ.length - 1) {
current = 0
}
setTimeout("typewrite()", speed2)
}
else {
setTimeout("typewrite()", speed)
}
}
typewrite()