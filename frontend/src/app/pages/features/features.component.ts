import { Component } from '@angular/core';
import { NavbarComponent } from '../layout/navbar/navbar.component';
import { NgClass } from '@angular/common';
@Component({
  selector: 'app-features',
  imports: [NgClass],
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

  isOpen(id:string){
    return id == this.open;
  }
}
