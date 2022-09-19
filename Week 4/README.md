To create an HTML list from JSON data:

Parse the JSON data into an array first (assuming it is a flat array) – `var data = JSON.parse(DATA);`
Loop through the array and create the HTML list.
`var list = document.createElement("ul");`
`for (let i of data) { var item = document.createElement("li"); list.appendChild(item); }`
Lastly, append the list to where you want – document.getElementById(ID).appendChild(list);