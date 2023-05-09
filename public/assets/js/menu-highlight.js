  $(function () {
    let url=window.location;
    let str=url.pathname.split("/");
    let activeLink=$('ul.nav.nav-sidebar a.nav-link').filter(function () {
    return this.href==url;  
    }).last();

    if (activeLink.length===0){
      activeLink=$('ul.nav.nav-sidebar a.nav-link').filter(function(){
        return this.href=='${url.origin}/${str[1]}';
      }).last();
    }
    activeLink.addClass('active');
    let menuOpen=activeLink.parents('.nav-item.has-treeview');
    menuOpen.addClass('menu-open');
    menuOpen.children('a.nav-link').addClass('active');
    menuOpen.children('ul.nav.nav-treeview').css('display','block');
  });
  $('body').on('click','li.nav-item.has-treeview',function () {
    let li=$('div.sidebar nav>ul.nav>li').not(this);
    li.removeClass('menu-open');
    li.find('ul').sideUp();
  })