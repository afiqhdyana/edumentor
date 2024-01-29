
var count=1;
function add_more_field(){
    count+=1
    html='<div class="row'+count+'">\
    <div class="col">\
        <div class="mb-3"><label class="form-label" for="booktitle"><strong>Title</strong><br></label><input class="form-control" type="text" id="username-1" name="course'+count+'" placeholder="How to Get Out of Friendzone 101"></div>\
    </div>\
    <div class="col">\
        <div class="mb-3"><label class="form-label" for="class"><strong>Category</strong><br></label><select name="grade'+count+'" class="form-select">\
            <optgroup label="This is a group">\
                <option value="12" selected="">This is item 1</option>\
                <option value="13">This is item 2</option>\
                <option value="14">This is item 3</option>\
            </optgroup>\
        </select></div>\
</div>'

var form=document.getElementById('addGrade_form')
form.innerHTML+=html
}