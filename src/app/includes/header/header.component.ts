import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  constructor() { }

  menuControl(order) {

    if (order === 'on') {

      document.getElementById('openMenu').style.display = 'none';
      document.getElementById('closeMenu').style.display = 'block';
      document.getElementById('mainMenu').style.display = 'block';

    }

    if (order === 'off') {

      document.getElementById('closeMenu').style.display = 'none';
      document.getElementById('openMenu').style.display = 'block';
      document.getElementById('mainMenu').style.display = 'none';

    }

  }

  ngOnInit() {
  }

}
