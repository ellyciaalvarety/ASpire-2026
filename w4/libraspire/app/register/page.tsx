"use client";

import Link from "next/link";
import { useState, useEffect } from "react";
import { useRouter } from "next/navigation";

export default function Register() {
  const router = useRouter();

  const [form, setForm] = useState({
    name: "",
    email: "",
    password: "",
    confirm: "",
  });

  // ✅ SEED USER AWAL
  useEffect(() => {
    const users = JSON.parse(localStorage.getItem("users") || "[]");

    if (users.length === 0) {
      const defaultUsers = [
        {
          name: "Admin",
          email: "admin@gmail.com",
          password: "123",
          role: "admin",
        },
        {
          name: "Member",
          email: "member@gmail.com",
          password: "123",
          role: "member",
        },
      ];

      localStorage.setItem("users", JSON.stringify(defaultUsers));
    }
  }, []);

  // ✅ HANDLE REGISTER
  const handleSubmit = (e: any) => {
    e.preventDefault();

    if (form.password !== form.confirm) {
      alert("Password tidak sama!");
      return;
    }

    const users = JSON.parse(localStorage.getItem("users") || "[]");

    // ✅ VALIDASI EMAIL DUPLIKAT
    const exists = users.find((u: any) => u.email === form.email);
    if (exists) {
      alert("Email sudah terdaftar!");
      return;
    }

    const newUser = {
      name: form.name,
      email: form.email,
      password: form.password,
      role: "member",
    };

    users.push(newUser);

    localStorage.setItem("users", JSON.stringify(users));

    alert("Register berhasil!");

    // ✅ FIX REDIRECT (PAKAI NEXT ROUTER)
    router.push("/login");
  };

  return (
    <div className="page-register">

      {/* NAVBAR */}
      <div className="navbar">
        LibrAspire
      </div>

      <main className="auth-wrap">
        <section className="auth-card">

          {/* FORM */}
          <div className="auth-form">
            <h2>Create Account</h2>
            <p className="sub">
              Daftar akun baru untuk mulai memakai LibrAspire.
            </p>

            <form onSubmit={handleSubmit}>
              <div className="field">
                <label>Nama</label>
                <input
                  type="text"
                  placeholder="Masukkan nama"
                  required
                  onChange={(e) =>
                    setForm({ ...form, name: e.target.value })
                  }
                />
              </div>

              <div className="field">
                <label>Email</label>
                <input
                  type="email"
                  placeholder="you@example.com"
                  required
                  onChange={(e) =>
                    setForm({ ...form, email: e.target.value })
                  }
                />
              </div>

              <div className="field">
                <label>Password</label>
                <input
                  type="password"
                  placeholder="Buat password"
                  required
                  onChange={(e) =>
                    setForm({ ...form, password: e.target.value })
                  }
                />
              </div>

              <div className="field">
                <label>Konfirmasi Password</label>
                <input
                  type="password"
                  placeholder="Ulangi password"
                  required
                  onChange={(e) =>
                    setForm({ ...form, confirm: e.target.value })
                  }
                />
              </div>

              <button type="submit" className="btn-register">
                Register
              </button>
            </form>

            <div className="form-footer">
              Sudah punya akun?{" "}
              <Link href="/login">Login sekarang</Link>
            </div>
          </div>

          {/* RIGHT SIDE */}
          <div className="auth-intro">
            <h1>Join LibrAspire</h1>
            <p>
              Buat akunmu dan nikmati pengalaman membaca yang lebih rapi,
              mulai dari eksplorasi koleksi hingga manajemen peminjaman.
            </p>
          </div>

        </section>
      </main>

      {/* CSS */}
      <style jsx>{`
        .navbar {
          padding: 20px 50px;
          font-size: 22px;
          font-weight: bold;
          color: #1e3a8a;
        }

        .page-register {
          min-height: 100vh;
          background: #eff3f8;
          font-family: 'Poppins', 'Segoe UI', Arial, sans-serif;
          display: flex;
          flex-direction: column;
        }

        .auth-wrap {
          flex: 1;
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 40px 24px;
        }

        .auth-card {
          width: min(980px, 100%);
          display: grid;
          grid-template-columns: 1fr 1fr;
          border-radius: 30px;
          overflow: hidden;
          background: #ffffff;
          box-shadow: 0 28px 65px rgba(15, 35, 77, 0.14);
        }

        .auth-form {
          padding: 46px 44px;
        }

        .auth-form h2 {
          font-size: 34px;
          color: #10214b;
        }

        .sub {
          margin-bottom: 24px;
          color: #5a6582;
        }

        .field {
          display: flex;
          flex-direction: column;
          gap: 8px;
          margin-bottom: 14px;
        }

        .field label {
          font-size: 13px;
          font-weight: 600;
          color: #5a6582;
        }

        .field input {
          border: 1px solid #d5dcea;
          border-radius: 14px;
          padding: 12px;
          background: #f9fbff;
        }

        .btn-register {
          width: 100%;
          border-radius: 999px;
          padding: 13px;
          background: #0f234d;
          color: white;
          cursor: pointer;
        }

        .btn-register:hover {
          background: #1d3772;
        }

        .auth-intro {
          padding: 52px;
          background: linear-gradient(165deg, #0f234d, #1d3772);
          color: white;
        }

        .form-footer {
          margin-top: 18px;
          text-align: center;
        }

        @media (max-width: 900px) {
          .auth-card {
            grid-template-columns: 1fr;
          }
        }
      `}</style>
    </div>
  );
}