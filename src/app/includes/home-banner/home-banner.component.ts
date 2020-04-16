import {Component, OnDestroy, OnInit} from '@angular/core';
import {SliderService} from '../../services/slider/slider.service';

@Component({
  selector: 'app-home-banner',
  templateUrl: './home-banner.component.html',
  styleUrls: ['./home-banner.component.css']
})
export class HomeBannerComponent implements OnInit, OnDestroy {

  slider: any;
  ativo: any;
  timer: any;

  carrossel() {

    if (this.ativo === this.slider.length) {
      this.ativo = this.slider[0].id;
    } else {
      this.ativo++;
    }

  }

  changeSlide(id) {

    this.ativo = id;
    clearInterval(this.timer);
    this.timer = window.setInterval(() => this.carrossel(), 5000);

  }

  constructor(
    private sliderService: SliderService
  ) { }

  ngOnInit() {

    this.ativo = null;

    this.sliderService.all().then(
      data => {
        this.slider = data;
        this.ativo = data[0].id;
        this.timer = window.setInterval(() => this.carrossel(), 5000);
      }
    );

  }

  ngOnDestroy() {
    clearInterval(this.timer);
  }

}
