const name = document.getElementById('first_name')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) =>{
	let messages = []
	if(first_name.value === '' || first_name.value == null){
		messages.push('First Name field cannot be empty')
	}
	if(first_name.value.length > 10){
		messages.push('FIRST NAME IS TOOOOOOOOOO LONG')
	}
	if(messages.length > 0){
		e.preventDefault()
		errorElement.innerText = messages.join(', ')
	}
	
		
})