"use client";
import { useEffect } from "react";
import { useRouter } from "next/navigation";
import { buku } from "@/data/buku";
import CardBuku from "@/app/components/CardBuku";

export default function AdminDashboard() {
  const router = useRouter();

  useEffect(() => {
    const role = localStorage.getItem("role");
    if (role !== "admin") {
      router.push("/login");
    }
  }, []);

  return (
    <div>
      <h1>Dashboard Admin</h1>

      <h2>Kelola Buku</h2>

      {buku.map((item) => (
        <CardBuku key={item.id} buku={item} isAdmin={true} />
      ))}
    </div>
  );
}