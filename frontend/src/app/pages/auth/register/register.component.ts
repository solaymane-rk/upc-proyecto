import { Component } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../../services/auth.service';

@Component({
  selector: 'app-register',
  imports: [ReactiveFormsModule],
  templateUrl: './register.component.html',
  styleUrl: './register.component.css'
})
export class RegisterComponent {

  loginError: string = '';
  isLoading: boolean = false;

  constructor(
    private authService: AuthService,
    private router: Router
  ) {}

  formContact = new FormGroup({
    name: new FormControl('', [
      Validators.required,
      Validators.minLength(3)
    ]),
    email: new FormControl('', [
      Validators.required,
      Validators.pattern(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)
    ]),
    password: new FormControl('', [
      Validators.required,
      Validators.pattern(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#._-]).*$/),
      Validators.minLength(6)
    ]),
  });

  submit(): void {
    if (this.formContact.valid) {
      this.isLoading = true;
      this.loginError = '';

      const { email, password } = this.formContact.value;

      this.authService.login(email!, password!).subscribe({
        next: (response: any) => {
          this.authService.saveToken(response.token);
          this.router.navigate(['/inicio']);
        },
        error: (err: any) => {
          this.isLoading = false;
          this.loginError = err.status === 401
            ? 'Email o contraseña incorrectos'
            : 'Ha ocurrido un error, inténtalo de nuevo';
        }
      });
    } else {
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
