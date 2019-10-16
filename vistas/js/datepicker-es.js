$(document).ready(function() {
    /* idioma calendario */
    $.fn.datepicker.dates['es'] = {
    days: ["Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado"],
    daysShort: ["dom","lun","mar","mié","jue","vie","sáb"],
    daysMin: ["D","L","M","X","J","V","S"],
    months: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
    monthsShort: ["Ene","Feb","Mar","Abr","May","jun", "Jul","Ago","Sep","Oct","Nov","Dic"],
    today: "Hoy",
    clear: "Limpiar",
    format: "dd-mm-yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
  };
})