import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
console.log('dentro product-list-component.ts');

@Component({
  selector: 'app-product-list',
  templateUrl: './product-list.component.html',
  styleUrls: ['./product-list.component.scss']
})
export class ProductListComponent implements OnInit {
  products: any[] = [];

  constructor(private http: HttpClient) {console.log('dentro costruttore ProductListComponent') }

  ngOnInit(): void {
    this.http.get<any[]>('http://localhost:8000/api/products').subscribe(response => {
      this.products = response;
    });
  }
}