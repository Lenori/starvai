import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeMarcasComponent } from './home-marcas.component';

describe('HomeMarcasComponent', () => {
  let component: HomeMarcasComponent;
  let fixture: ComponentFixture<HomeMarcasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ HomeMarcasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(HomeMarcasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
