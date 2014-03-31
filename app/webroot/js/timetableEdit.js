function changeColor(obj,str)
{
    var inp = document.getElementById(str);
    var di = document.getElementById("123");
    if(inp.value == "0")
    {
         obj.setAttribute("class","checked");
         inp.setAttribute("value","1");
    }
    else
    {
        obj.setAttribute("class","unChecked");
        inp.setAttribute("value","0");
    }
    di.innerHTML = (inp.value);
}