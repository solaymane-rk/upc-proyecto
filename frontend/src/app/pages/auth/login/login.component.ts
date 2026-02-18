import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';

@Component({
  selector: 'app-login',
  imports: [ReactiveFormsModule],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {
  formContact = new FormGroup({
    email: new FormControl('', [
      Validators.required, 
      Validators.pattern(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)
    ]),
    // pattern tiene que contener obligatoriamente: una minuscula, una mayuscula, un numero y un caracter especial
    password: new FormControl('', [
      Validators.required, 
      Validators.pattern(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#._-]).*$/),
      Validators.minLength(6)
    ]),
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

  verOcultarPassword(): void {
    const passwordInput = document.getElementById('password') as HTMLInputElement;
    const passwordIcon = document.getElementById('password-icon') as HTMLElement;
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      passwordIcon.classList.remove('fa-eye-slash');
      passwordIcon.classList.add('fa-eye');
    } else {
      passwordInput.type = 'password';
      passwordIcon.classList.remove('fa-eye');
      passwordIcon.classList.add('fa-eye-slash');
    }
  }
}
