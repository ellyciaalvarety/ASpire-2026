"use client";

import { useState } from "react";
import { useRouter } from "next/navigation";

export default function Login() {
  const [role, setRole] = useState("member");
  const router = useRouter();

  const handleLogin = () => {
    localStorage.setItem("role", role);

    if (role === "admin") {
      router.push("/admin/dashboard");
    } else {
      router.push("/member/dashboard");
    }
  };

  return (
    <div style={{ textAlign: "center", marginTop: "50px" }}>
      <h1>Login</h1>

      <select onChange={(e) => setRole(e.target.value)}>
        <option value="member">Member</option>
        <option value="admin">Admin</option>
      </select>

      <br /><br />

      <button onClick={handleLogin}>Masuk</button>
    </div>
  );
}