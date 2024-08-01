// function senon() {
//   document.getElementById("f").style.display = "none";
// }
// function noned() {
//   document.getElementById("ff").style.display = "none";
//   document.getElementById("f").style.display = "block";
// }
const validName = /^[A-Za-zء-ي]*\s{1}[A-Za-zء-ي]*$/i; //  /\W*\s\W*/i
// const validEmail = /^*@(gmail|hotmail|yahoo|outlook)\.(com|org|info)/i;

document.getElementById("reg").onsubmit = function () {
  const userName = document.querySelector("#name");
  if (userName.value == "") {
    alert("يجب ادخال الاسم مع اللقب");
    return false;
  } else if (!validName.test(userName.value)) {
    alert("ادخل الاسم واللقب بشكل صحيح");
    return false;
  }

  const userPass = document.querySelector("#pass");
  const confPass = document.querySelector("#pass1");
  if (userPass.value.length < 8) {
    alert("يجب وضع كلمة مرور ما لا يقل عن 8 احرف");
    return false;
  }
  if (confPass.value == "") {
    alert("يرجى تأكيد كلمة المرور");
    return false;
  } else if (confPass.value != userPass.value) {
    alert("كلمة المرور غير متطابقة");
    return false;
  }
  var email = document.querySelector("#email");
  if (email.value == "") {
    alert("يجب ادخال ايميل");
    return false;
  }
  const userPhone = document.querySelector("#user-phone");
  if (userPhone.value == "") {
    alert("يجب ادخال رقم الهاتف");
    return false;
  } else if (userPhone.value.length < 9) {
    alert("ادخل رقم هاتف صحيح");
    return false;
  }
  if (
    Register.gander[0].checked == false &&
    Register.gander[1].checked == false
  ) {
    alert("يجب تحديد الجنس");
    return false;
  }

  if (document.querySelector("#country").selectedIndex == 0) {
    alert("يجب تحديد الدولة");
    return false;
  }

  const notes = document.Register.notes;
  if (notes.value == "") {
    alert("يجب ادخال الملاحظات");
    return false;
  } else if (notes.value.length < 50) {
    alert("يجب ادخال ملاحظات لا يقل عن 50 حرف");
    return false;
  }

  const file = document.Register.user_img;
  const validFileExt = /(\.jpg|\.jpeg|\.png|\.svg)$/i;
  if (!validFileExt.exec(file.value)) {
    alert("يجب رفع ملف صالح");
    return false;
  }

  if (document.getElementById("user_agreement").checked == false) {
    alert("يجب الموافقة على شروط الاستخدام");
    return false;
  }

  return true;
};

function submit() {
  if (document.Register.user_agreement.checked == true)
    documnet.Register.ok.disabled = false;
  else documnet.Register.ok.disabled = true;
}
