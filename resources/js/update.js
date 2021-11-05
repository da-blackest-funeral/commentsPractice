let buttonEdit = document.querySelectorAll('.comments__in-edit');
buttonEdit.forEach(function (el) {
    el.addEventListener('click', EditingComments);
});

function EditingComments(e) {
    // id для того, чтобы указать место, где заменить p
    let replaceP = document.getElementById("message" + e.target.id);
    let pValue = replaceP.innerHTML;
    console.log(pValue);
    // создаю и настраиваю input
    let input = document.createElement('input');
    input.name = 'newComment';
    input.type = 'text';
    input.className = 'comments__form-text comments__input';
    input.id = 'comment-text';
    input.placeholder = pValue;
    // Вставляю его в нужное место
    replaceP.replaceWith(input);

    // Место замены кнопки
    let replaceBtn = document.getElementById(e.target.id);
    // Создаю и настраиваю кнопку
    let inputSave = document.createElement('input');
    inputSave.className = 'comments__in-save btn';
    inputSave.type = 'submit';
    inputSave.innerHTML = 'Сохранить';
    // Вставляю его в нужное место
    replaceBtn.replaceWith(inputSave);

    let replaceDiv = document.getElementById("div" + e.target.id);
    let form = document.createElement('form');
    form.className = 'note alert-info';
    form.style = replaceDiv.style;
    form.innerHTML = replaceDiv.innerHTML;
    form.method = 'POST';
    form.action = '/update/' + e.target.id;
    replaceDiv.replaceWith(form);
}
