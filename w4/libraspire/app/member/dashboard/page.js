"use client";
import { useEffect } from "react";
import { useRouter } from "next/navigation";
import { buku } from "@/data/buku";
import CardBuku from "@/app/components/CardBuku";

export default function MemberDashboard() {
  const router = useRouter();

  useEffect(() => {
    const role = localStorage.getItem("role");
    if (role !== "member") {
      router.push("/login");
    }
  }, []);

  return (
    <div>
      <h1>Dashboard Member</h1>

      <h2>Daftar Buku</h2>

      {buku.map((item) => (
        <CardBuku key={item.id} buku={item} />
      ))}
    </div>
  );
}