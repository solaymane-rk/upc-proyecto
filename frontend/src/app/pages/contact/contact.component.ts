import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';

@Component({
  selector: 'app-contact',
  imports: [ReactiveFormsModule],
  templateUrl: './contact.component.html',
  styleUrl: './contact.component.css'
})
export class ContactComponent {

  formContact = new FormGroup({
    nombre: new FormControl('', [Validators.required, Validators.minLength(3), Validators.pattern('^[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+$')]),
    apellido: new FormControl('', [Validators.required, Validators.pattern('^[a-zA-ZáéíóúÁÉÍÓÚÑñ ]+$')]),
    email: new FormControl('', [
      Validators.required, 
      Validators.pattern('^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$')
    ]),
    instituto: new FormControl('', [Validators.required]),
    comentarios: new FormControl('', [Validators.required, Validators.minLength(10)]),
    aceptaPrivacidad: new FormControl(false, [Validators.requiredTrue])
  });

  submit(): void {
    alert('Enviando formulario...');
    console.log('Formulario enviado:', this.formContact.value);
    if (this.formContact.valid) {
      console.log('Formulario enviado:', this.formContact.value);
      alert('Formulario enviado correctamente');
      this.formContact.reset();
    } else {
      alert('Por favor, completa todos los campos correctamente');
      // Marcar todos los campos como tocados para mostrar errores
      Object.keys(this.formContact.controls).forEach(key => {
        this.formContact.get(key)?.markAsTouched();
      });
    }
  }
}
