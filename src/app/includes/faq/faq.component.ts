import { Component, OnInit } from '@angular/core';
import {FaqService} from '../../services/faq/faq.service';

@Component({
  selector: 'app-faq',
  templateUrl: './faq.component.html',
  styleUrls: ['./faq.component.css']
})
export class FaqComponent implements OnInit {

  faqs: any;
  openFaq: any;

  constructor(
    private faqService: FaqService
  ) { }

  ngOnInit() {

    this.faqService.all().then(
      data => {
        this.faqs = data;
      }
    );

  }

}
