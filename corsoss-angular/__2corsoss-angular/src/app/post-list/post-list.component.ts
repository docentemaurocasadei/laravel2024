import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';


interface Post {
  id: number;
  name: string;
  description: string;
  excerpt: string;
  author: string;
  date_publish: string;
  category_id: number;
}

@Component({
  selector: 'app-post-list',
  templateUrl: './post-list.component.html',
  styleUrls: ['./post-list.component.scss']
})
export class PostListComponent implements OnInit {
  posts: Post[] = [];
  categories: any[] = [];
  selectedCategoryId?: number | undefined;

  constructor(private http: HttpClient) { }

  ngOnInit() {
    this.getPosts();
  }

  getPosts(categoryId?: number) {
    const url = `http://127.0.0.1:8000/api/products}`;

    this.http.get<Post[]>(url)
      .subscribe(posts => {
        this.posts = posts;
      });
  }



}
