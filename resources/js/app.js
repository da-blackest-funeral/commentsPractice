require('./bootstrap');
// Массив где хранятся значения
let comments = [];
// // это для себя переменная чтобы просто вывести на экран комменты
// let out = '';
// Для себя место куда вывести комментарии
//let commentsItems = document.getElementById('comments-items');
document.getElementById('comments-add').onclick = function (e) {
    //Функция прерывает обновление стр
    e.preventDefault();
    // Получаю значения с импутов
    getValue();
    // Вывожу их на экран (тебе она не нужна, сделал для себя)
    //showComments();
};

function getValue() {
    // Получаю элементы формы
    let commentName = document.getElementById('comment-name');
    let commentText = document.getElementById('comment-text');
    let comment = {
        name: commentName.value,
        text: commentText.value,
    };
    // Добовляю значения в массив
    comments.push(comment);
}

// function showComments() {
//   // Перебераю значения с массива (нужно будет так же с помощью forEach перебрать p и занести через ${} значения)
//   comments.forEach(function (item) {
//     out += `<form class="comments__field-item">`;
//     out += `<p class="comments__name">${item.name}</p>`;
//     // чтобы перенести, добавь к своим p и кнопке уникал. id
//     out += `<p id="urUniqueId[0]" class="comments__text">${item.text}</p>`;
//     // Кнопка которая вызывает нужную тебе функцию, в теории можно сделать onclick="EditingComments()", но так у меня перезагружает стр, мб на php такого не будет
//     out += `<button class="comments__btn-edit btn" id="comments-edit[0]" type="submit">
//             Редактировать
//           </button>`;
//     out += `</form>`;
//   });
//   commentsItems.innerHTML = out;
//   out = '';
//   // Либо можешь вызвать эту функцию так же
//   let buttonEdit = document.querySelectorAll('.comments__btn-edit');
//   buttonEdit.forEach(function (el) {
//     el.addEventListener('click', EditingComments);
//   });
// }
// То что тебе нужно, заменяю p на input
function EditingComments(e) {
    e.preventDefault();
    // id для того, чтобы указать место, где заменить p
    let replaceP = document.getElementById('urUniqueId[0]');
    // создаю и настраиваю input
    let input = document.createElement('input');
    input.className = 'comments__form-text comments__input';
    input.id = 'comment-text';
    input.placeholder = 'Текст:';
    comments.forEach(function (item) {
        input.value = `${item.text}`;
    });
    // Вставляю его в нужное место
    replaceP.replaceWith(input);
    // Место замены кнопки (кнопка сохранить не рабочая, думаю у тебя там php своя слогика поэтому не стал заморачиваться)
    let replaceBtn = document.getElementById('comments-edit[0]');
    // Создаю и настраиваю кнопку
    let btnSave = document.createElement('button');
    btnSave.className = 'comments__btn-save btn';
    btnSave.id = 'comments-save[0]';
    btnSave.type = 'submit';
    btnSave.innerHTML = 'Сохранить';
    // Вставляю его в нужное место
    replaceBtn.replaceWith(btnSave);
}
