import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { BlogRecentesComponent } from './blog-recentes.component';

describe('BlogRecentesComponent', () => {
  let component: BlogRecentesComponent;
  let fixture: ComponentFixture<BlogRecentesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BlogRecentesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BlogRecentesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
