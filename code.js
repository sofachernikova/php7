function addElement(table_name) // функция добавляет еще один элемент
{
var t = document.getElementById(table_name); 
var index=t.rows.length; 

var row=t.insertRow(index); // добавляем новую строку
var cel1 =row.insertCell(0);
setHTML(cel1, index);
var cel = row.insertCell(1); // добавляем в строку ячейку
cel.className='element_row'; // определяем css-класс ячейки

// формируем html-код содержимого ячейки
var celcontent='<input type="text" name="element'+ index +'">';

// добавляем контент в ячеку таблицы
setHTML(cel, celcontent);
// записываем количество полей (строк)
document.getElementById('arrLength').value=t.rows.length;
}

function setHTML(element, txt)
{
if(element.innerHTML)
element.innerHTML = txt;
else
{
var range = document.createRange();
range.selectNodeContents(element);
range.deleteContents();
var fragment = range.createContextualFragment(txt);
element.appendChild(fragment);
}
}

$(document).ready(function(){
 $("input#em").change(function(){

  if ($(this).attr("checked")) {
      $('#hide').fadeIn().show();
      return;
  } else {
      $('#hide').fadeOut(300); 
  }

 });
})