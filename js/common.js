(function() {

  console.log('javascript(common.js)');

  document.addEventListener('DOMContentLoaded', function() {
    let sidevar = new SideVar();
    let changedisplay = new ChangeDisplay();
    let createhtml = new CreateHtml();

    /////////////////////////////////////////////////////////////

    //サイドバーのカレントを表すバー
    sidevar.sideBottomVar();

    ////////////////////////////////////////////////////////////

    changedisplay.init(); //mainコンテンツのdisplayの初期化

    sideIdMember.home.addEventListener('click', function() {
      changedisplay.changeOnOff(mainIdMember.home);
    }, false);
    // sideIdMember.join.addEventListener('click', function() {
    //   changedisplay.changeOnOff(mainIdMember.join);
    // }, false);
    sideIdMember.minutes.addEventListener('click', function() {
      changedisplay.changeOnOff(mainIdMember.minutes);
    },false);
    sideIdMember.idead.addEventListener('click', function() {
      changedisplay.changeOnOff(mainIdMember.idead);
    },false);
    sideIdMember.document.addEventListener('click', function() {
      changedisplay.changeOnOff(mainIdMember.document);
    },false);
    // sideIdMember.settings.addEventListener('click', function() {
    //   changedisplay.changeOnOff(mainIdMember.settings);
    // },false);

    mainIdMember.fileBtn.addEventListener('click', function() {
      changedisplay.changeOnOff(mainIdMember.fileDocument);
      this.classList.toggle('current_file_url');
      mainIdMember.urlBtn.classList.remove('current_file_url');
    }, false);
    mainIdMember.urlBtn.addEventListener('click', function() {
      changedisplay.changeOnOff(mainIdMember.urlDocument);
      this.classList.toggle('current_file_url');
      mainIdMember.fileBtn.classList.remove('current_file_url');
    }, false);

    // mainIdMember.blackBtn.addEventListener('click', function() {
    //   this.classList.toggle('color_change_box_current');
    //   mainIdMember.whiteBtn.classList.remove('color_change_box_current');
    // }, false);
    // mainIdMember.whiteBtn.addEventListener('click', function() {
    //   this.classList.toggle('color_change_box_current');
    //   mainIdMember.blackBtn.classList.remove('color_change_box_current');
    // }, false);

    ////////////////////////////////////////////////////////////

    // otherIdMember.joinProject.addEventListener('click', function() {
    //   this.classList.toggle('joinProjectClicked');
    //   otherIdMember.msg.classList.toggle('msg_box');
    //   createhtml.create(otherIdMember.msg, 'h3', 'あなたが参加できるプロジェクト');
    //   createhtml.create(otherIdMember.msg, 'p', 'TJHS');

    //   if((joinProjectClicked % 2) == 1) {
    //     createhtml.delete(otherIdMember.msg);
    //     createhtml.delete(otherIdMember.msg);
    //     createhtml.delete(otherIdMember.msg);
    //     createhtml.delete(otherIdMember.msg);
    //   }

    //   joinProjectClicked++;
    // }, false);

    ////////////////////////////////////////////////////////////
  }, false);

}).call(this);

// The creator of this code is Kojima Naoyuki