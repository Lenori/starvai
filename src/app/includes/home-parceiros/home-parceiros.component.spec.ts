import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeParceirosComponent } from './home-parceiros.component';

describe('HomeParceirosComponent', () => {
  let component: HomeParceirosComponent;
  let fixture: ComponentFixture<HomeParceirosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HomeParceirosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeParceirosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
