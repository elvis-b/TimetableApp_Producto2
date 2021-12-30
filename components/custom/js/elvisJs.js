let currentRetrievedCourse = {};
let currentRetrievedClass = {};
let currentRetrievedUser = {};
let studentList = [];
let selectedStudentList = [];
let selectedStudent = {};


function retrieveUser(id, type) {
    let desiredId = parseInt(id);
    let functionName = type === 'student' ? 'getStudentById' : 'getTeacherByIdAll';
    $.ajax({
        url: "./ajax/ajax.handler.php",
        data: {class: 'ControladorUsuarios', function: functionName, parameter: desiredId},
        type: 'POST',
        success: function (result) {
            currentRetrievedUser = JSON.parse(result);
            $('#username').val(currentRetrievedUser['username']);
            $('#modalName').val(currentRetrievedUser['name']);
            $('#surname').val(currentRetrievedUser['surname']);
            $('#telephone').val(currentRetrievedUser['telephone']);
            $('#email').val(currentRetrievedUser['email']);
            let element = type === 'student' ? '#idStudentModal' : '#idTeacherModal';
            $(element).val(desiredId);
        }
    });
}


function retrieveCourse(id) {
    let desiredId = parseInt(id);
    $.ajax({
        url: "./ajax/ajax.handler.php",
        data: {class: 'ControladorCursos', function: 'getCourseInfo', parameter: desiredId},
        type: 'POST',
        success: function (result) {
            currentRetrievedCourse = JSON.parse(result);
            $('#descripcion').val(currentRetrievedCourse['description']);
            $('#nombre').val(currentRetrievedCourse['name']);
            let dateEndSplitArr = currentRetrievedCourse['date_end'].split(" ");
            let dateStartSplitArr = currentRetrievedCourse['date_start'].split(" ");
            $('#dateStart').val(dateStartSplitArr[0] + 'T' + dateStartSplitArr[1]);
            $('#dateEnd').val(dateEndSplitArr[0] + 'T' + dateEndSplitArr[1]);
            $('#idCursoModal').val(desiredId);
        }
    });
}


function retrieveClass(id) {
    let desiredId = parseInt(id);
    $.ajax({
        url: "./ajax/ajax.handler.php",
        data: {class: 'ControladorClases', function: 'getClassInfo', parameter: desiredId},
        type: 'POST',
        success: function (result) {
            currentRetrievedClass = JSON.parse(result)['classInfo'];
            $('#classNombre').val(currentRetrievedClass['name']);
            $('#profesor').val(currentRetrievedClass['profesor']);
            $('#dateStart').val(currentRetrievedClass['date_start']);
            $('#dateEnd').val(currentRetrievedClass['date_end']);
            $('#color').val(currentRetrievedClass["color"]);
            $('#idTeacher').val(currentRetrievedClass['id_teacher']);
            $('#idCourse').val(currentRetrievedClass['id_course']);
            $('#idClassModal').val(desiredId);
            selectedStudentList = JSON.parse(result)['students'];
            initExistingStudents();
            $('#cp2').colorpicker();
        }
    });
}

function askIfSure(formName, id, attribute) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.getElementById(formName + id);
            var courseId = $('input[type="text"]');
            courseId.val(id);
            courseId.attr('name', attribute);
            courseId.attr('type', 'hidden');
            courseId.appendTo(form);
            form.submit();
        }
    })
};

function alertOkAndNavigateTo(href, message) {
    Swal.fire({
        title: 'Success!',
        text: message,
        icon: 'success',
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Great!'
    }).then(() => {
        location.href = href;
    })
};

function alertGeneral(message, type, title) {
    Swal.fire({
        title: 'Warning!',
        text: message,
        icon: type,
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok'
    });
}

function alertWarning(message) {
    alertGeneral(message, 'warning', 'Warning!');
}

function alertError(message) {
    alertGeneral(message, 'error', 'Error!');
}


function buildInitialStudentList() {
    $(".hidden-users li").each(function () {
        let studentObject = {
            id: $(this).attr("id"),
            name: $(this).attr("name"),
        };
        studentList.push(studentObject);
    });
    updateSelectionPool();
}

function updateSelectionPool() {
    $("#studentSelection").empty();
    studentList.sort(dynamicSort("id"));
    studentList.forEach(function (item) {
        $("#studentSelection").append('<option value="' + item.id + '">' + item.name + '</option>');
    });

}

function initExistingStudents() {
    for (existingStudent of selectedStudentList) {
        let index = 0;
        for (student of studentList) {
            if (student.id === existingStudent.id) {
                studentList.splice(index, 1);
            }
            index++;
        }
    }
    updateSelectionPool();
    updateTable();
}

function addStudentToSelectedList() {
    let id = $("#studentSelection").val();
    let index = 0;
    for (student of studentList) {
        if (student.id === id) {
            selectedStudentList.push(student);
            studentList.splice(index, 1);
        }
        index++;
    }
    updateSelectionPool();
    updateTable();
}

function removeStudentFromSelectedList(id) {
    let index = 0;
    for (student of selectedStudentList) {
        if (parseInt(student.id) === id) {
            studentList.push(student);
            selectedStudentList.splice(index, 1);
        }
        index++;
    }
    updateSelectionPool();
    updateTable();
}

function updateTable() {
    $("#selectedStudents").empty();
    let markupForEmpty = "  <tr>\n" +
        "                        <td colspan=\"100%\" id=\"noUsersYet\">No Users Added</td>\n" +
        "                    </tr>";
    $("#selectedStudents").append(markupForEmpty);

    if (selectedStudentList.length < 1) {
        $("#noUsersYet").show();
    } else {
        $("#noUsersYet").hide();
    }

    selectedStudentList.forEach(function (item) {
        let markup = '<tr studentId ="' + item.id + '"><td>' + item.name + '</td><td><button class = "btn btn-danger" onclick=" removeStudentFromSelectedList(' + item.id + ') ">Remove</button></td></tr>';
        $("#selectedStudents").append(markup);
    })
    setSelectionData();
}

function dynamicSort(property) {
    var sortOrder = 1;
    if (property[0] === "-") {
        sortOrder = -1;
        property = property.substr(1);
    }
    return function (a, b) {
        var result = (a[property] < b[property]) ? -1 : (a[property] > b[property]) ? 1 : 0;
        return result * sortOrder;
    }
}

function setSelectionData() {
    let commaSeparatedIds = '';
    selectedStudentList.forEach(function (item) {
        commaSeparatedIds += item.id + ",";
    })
    $('#commaSeparatedIds').val(commaSeparatedIds);
}