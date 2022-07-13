$(function() {
  const currentLocation = location.href;
  const menuItem = $(".nav-li");
  const menuItemLink = $(".nav-li a");
  const menuItemLength = menuItem.length;
  for(let i = 0; i< menuItemLength; i++) 
  {
    if(menuItemLink[i].href === currentLocation) {
      menuItem[i].classList.add("active");

    }
  }
})