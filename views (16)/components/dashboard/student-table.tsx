"use client"

import { useState } from "react"
import { Search, Eye } from "lucide-react"

interface Student {
  id: string
  name: string
  nisn: string
  class: string
  major: string
  academicYear: string
  status: "Active" | "Inactive"
  avatar: string
}

export function StudentTable() {
  const [searchTerm, setSearchTerm] = useState("")
  const [sortBy, setSortBy] = useState("name")
  const [currentPage, setCurrentPage] = useState(1)

  const students: Student[] = [
    {
      id: "1",
      name: "Alex Johnson",
      nisn: "0055123456",
      class: "10A",
      major: "Engineering",
      academicYear: "2024",
      status: "Active",
      avatar: "👨",
    },
    {
      id: "2",
      name: "Sarah Smith",
      nisn: "0055123457",
      class: "10B",
      major: "Science",
      academicYear: "2024",
      status: "Active",
      avatar: "👩",
    },
    {
      id: "3",
      name: "Mike Chen",
      nisn: "0055123458",
      class: "11A",
      major: "Commerce",
      academicYear: "2024",
      status: "Active",
      avatar: "👨",
    },
    {
      id: "4",
      name: "Emma Davis",
      nisn: "0055123459",
      class: "11B",
      major: "Arts",
      academicYear: "2024",
      status: "Inactive",
      avatar: "👩",
    },
    {
      id: "5",
      name: "James Wilson",
      nisn: "0055123460",
      class: "12A",
      major: "Engineering",
      academicYear: "2024",
      status: "Active",
      avatar: "👨",
    },
  ]

  const filteredStudents = students.filter(
    (student) => student.name.toLowerCase().includes(searchTerm.toLowerCase()) || student.nisn.includes(searchTerm),
  )

  const itemsPerPage = 5
  const paginatedStudents = filteredStudents.slice((currentPage - 1) * itemsPerPage, currentPage * itemsPerPage)

  return (
    <div className="glass-card-hover rounded-xl overflow-hidden">
      {/* Header */}
      <div className="p-6 border-b border-border/50">
        <div className="flex items-center justify-between">
          <h3 className="text-lg font-semibold text-foreground">Latest Students</h3>
          <div className="relative w-64">
            <Search className="absolute left-3 top-1/2 -translate-y-1/2 text-muted-foreground" size={18} />
            <input
              type="text"
              placeholder="Search by name or NISN..."
              value={searchTerm}
              onChange={(e) => setSearchTerm(e.target.value)}
              className="w-full pl-10 pr-4 py-2 rounded-lg bg-muted border border-border/50 text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary/50 transition-all"
            />
          </div>
        </div>
      </div>

      {/* Table */}
      <div className="overflow-x-auto">
        <table className="w-full">
          <thead>
            <tr className="border-b border-border/50">
              <th className="px-6 py-3 text-left text-sm font-semibold text-muted-foreground">Name</th>
              <th className="px-6 py-3 text-left text-sm font-semibold text-muted-foreground">NISN</th>
              <th className="px-6 py-3 text-left text-sm font-semibold text-muted-foreground">Class</th>
              <th className="px-6 py-3 text-left text-sm font-semibold text-muted-foreground">Major</th>
              <th className="px-6 py-3 text-left text-sm font-semibold text-muted-foreground">Year</th>
              <th className="px-6 py-3 text-left text-sm font-semibold text-muted-foreground">Status</th>
              <th className="px-6 py-3 text-center text-sm font-semibold text-muted-foreground">Action</th>
            </tr>
          </thead>
          <tbody>
            {paginatedStudents.map((student, index) => (
              <tr
                key={student.id}
                className="border-b border-border/30 hover:bg-muted/30 transition-colors duration-200"
              >
                <td className="px-6 py-4">
                  <div className="flex items-center gap-3">
                    <div className="w-10 h-10 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-lg">
                      {student.avatar}
                    </div>
                    <span className="font-medium text-foreground">{student.name}</span>
                  </div>
                </td>
                <td className="px-6 py-4 text-sm text-muted-foreground">{student.nisn}</td>
                <td className="px-6 py-4 text-sm text-foreground">{student.class}</td>
                <td className="px-6 py-4 text-sm text-foreground">{student.major}</td>
                <td className="px-6 py-4 text-sm text-foreground">{student.academicYear}</td>
                <td className="px-6 py-4">
                  <span
                    className={`px-3 py-1 rounded-full text-xs font-semibold ${
                      student.status === "Active" ? "bg-green-500/20 text-green-400" : "bg-red-500/20 text-red-400"
                    }`}
                  >
                    {student.status}
                  </span>
                </td>
                <td className="px-6 py-4 text-center">
                  <button className="p-2 rounded-lg hover:bg-muted transition-colors inline-flex items-center justify-center">
                    <Eye size={18} className="text-primary hover:text-secondary transition-colors" />
                  </button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      {/* Pagination */}
      <div className="px-6 py-4 border-t border-border/50 flex items-center justify-between">
        <p className="text-sm text-muted-foreground">
          Showing {paginatedStudents.length} of {filteredStudents.length} results
        </p>
        <div className="flex gap-2">
          <button
            onClick={() => setCurrentPage((p) => Math.max(1, p - 1))}
            disabled={currentPage === 1}
            className="px-4 py-2 rounded-lg bg-muted hover:bg-muted/80 disabled:opacity-50 transition-colors"
          >
            Previous
          </button>
          <button
            onClick={() => setCurrentPage((p) => p + 1)}
            disabled={paginatedStudents.length < itemsPerPage}
            className="px-4 py-2 rounded-lg bg-muted hover:bg-muted/80 disabled:opacity-50 transition-colors"
          >
            Next
          </button>
        </div>
      </div>
    </div>
  )
}
