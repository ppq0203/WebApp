window.onload = function() {
    $("b_xml").onclick=function(){
		new Ajax.Request("books.php?category=" + getCheckedRadio($$("div#category label input")), {
			method: "get",
			onSuccess : showBooks_XML
		});
    	    //construct a Prototype Ajax.request object
    }
    $("b_json").onclick=function(){
		new Ajax.Request("books_json.php?category=" + getCheckedRadio($$("div#category label input")), {
			method: "get",
			onSuccess : showBooks_JSON
		});
    	    //construct a Prototype Ajax.request object
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
	alert(ajax.responseText);
	var books = ajax.responseXML.getElementsByTagName("book");
	var booksul = $("books");
	var booksli = $$("ul#books li");
	for(var i =0; i < booksli.length; i++){
		booksul.removeChild(booksli[i]);
	}
	
	console.log(books);
	for (var i = 0; i < books.length; i++) {
		var category = books[i].getAttribute("category");
	
		// extract data from XML
		var title = books[i].getElementsByTagName("title")[0].firstChild.nodeValue;
		var author = books[i].getElementsByTagName("author")[0].firstChild.nodeValue;
		var year = books[i].getElementsByTagName("year")[0].firstChild.nodeValue;
		console.log(title + ", by " + author);
		
		// make an HTML <p> tag containing data from XML
		var li = document.createElement("li");
		li.innerHTML = title + ", by " + author + " (" + year + ")"; 
		booksul.appendChild(li);
		
	}
}

function showBooks_JSON(ajax) {
	alert(ajax.responseText);
	var data = JSON.parse(ajax.responseText);
	var booksul = $("books");
	var booksli = $$("ul#books li");
	for(var i =0; i < booksli.length; i++){
		booksul.removeChild(booksli[i]);
	}

    for (var i = 0; i < data.books.length; i++) {
        var li = document.createElement("li");
        li.innerHTML = data.books[i].title + ", by " + data.books[i].author + " (" + data.books[i].year + ")";
        booksul.appendChild(li);
    }
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText + 
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
