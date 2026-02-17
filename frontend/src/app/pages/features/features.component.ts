import { Component } from '@angular/core';
import { NavbarComponent } from '../layout/navbar/navbar.component';
@Component({
  selector: 'app-features',
  imports: [],
  templateUrl: './features.component.html',
  styleUrl: './features.component.css'
})
export class FeaturesComponent {
  protected open: string = "";

  toggle(event:Event){
    let element = event.currentTarget as HTMLElement

    this.open = this.open == element.id ? "" : element.id;
    console.log(this.open)
  }
}
