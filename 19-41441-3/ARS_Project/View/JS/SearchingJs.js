function isValid(search_js)
{
	const category = search_js.category.value;

	if(category === "emp")
	{
		document.getElementById("rp1").innerHTML = "Please select a category";
		return false;
	}
	else
	{
		document.getElementById("rp1").innerHTML = "";
		return true;
	}
}