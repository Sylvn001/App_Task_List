function edit(id, text, pag){
        
        // Edit Form 
        let form = document.createElement('form')  
        form.action = `${pag}.php?pag=${pag}&action=update`
        form.method = 'post'
        form.className = ' row'
        //Input text 
        let inputTask = document.createElement('input')
        inputTask.type = 'text'
        inputTask.name = 'task'
        inputTask.className = 'form-control col-9'
        inputTask.value = text;

        //input Hidden 
        let inputId = document.createElement('input')
        inputId.type = 'hidden'
        inputId.name = 'id'
        inputId.value = id

        //Button
        let btn = document.createElement('button')
        btn.type = 'submit'
        btn.className = ' btn btn-info col-3'
        btn.innerHTML = 'atualizar'
        //include  inputTask on Form
        form.appendChild(inputTask) 
        //Include button on form 
        form.appendChild(btn)
        //Include Hidden input 
        form.appendChild(inputId)
        task = document.getElementById(`task_${id}`)
        //clear text for include form 
        task.innerHTML =  ""
        task.insertBefore(form, task[0])

}

function remove(id, pag){
        
        location.href = `${pag}.php?pag=${pag}&action=remove&id=${id}`;
}

function check(id, pag){
        location.href = `${pag}.php?pag=${pag}&action=check&id=${id}`;
}