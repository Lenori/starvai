import { Component, OnInit, HostListener, Inject } from '@angular/core';
import { DOCUMENT } from '@angular/common';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {

  constructor(
    @Inject(DOCUMENT) private document: Document
  ) { }

  @HostListener('window:scroll', [])
  onWindowScroll() {

    if (document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20) {
      document.getElementById('menu').classList.remove('menu');
      document.getElementById('menu').classList.add('menu-fixed');
    } else {
      document.getElementById('menu').classList.remove('menu-fixed');
      document.getElementById('menu').classList.add('menu');
    }

  }

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
