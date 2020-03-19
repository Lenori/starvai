import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BlogCategoriasComponent } from './blog-categorias.component';

describe('BlogCategoriasComponent', () => {
  let component: BlogCategoriasComponent;
  let fixture: ComponentFixture<BlogCategoriasComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BlogCategoriasComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BlogCategoriasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
