/*
 Реализовать функцию, которая принимает строку и удаляет из неё первый и последний символ если это спец.символ
 (если идут подряд несколько то до того пока не закончатся).
 И возвращает строку удалённых элементов.
 */

function replaceString(string) {
    return string.replace(/(^(?:[^a-zA-Z0-9]+))|(?:[^a-zA-Z0-9]+$)/g, "");
}

console.log(replaceString('!!!@@@||!43W!!w!Aasdfdas1234!!#!@EDAS@Ddsa@!!as@!!!@@@||!!'));