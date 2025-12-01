"use client"

import {
  LineChart,
  Line,
  BarChart,
  Bar,
  PieChart,
  Pie,
  Cell,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  ResponsiveContainer,
} from "recharts"

const studentGrowthData = [
  { year: 2020, students: 200 },
  { year: 2021, students: 450 },
  { year: 2022, students: 680 },
  { year: 2023, students: 950 },
  { year: 2024, students: 1250 },
]

const majorDistributionData = [
  { name: "Engineering", value: 350 },
  { name: "Science", value: 280 },
  { name: "Commerce", value: 240 },
  { name: "Arts", value: 180 },
]

const classesPerGradeData = [
  { grade: "10", classes: 12 },
  { grade: "11", classes: 14 },
  { grade: "12", classes: 14 },
  { grade: "13", classes: 8 },
]

const COLORS = ["#8b5cf6", "#06b6d4", "#10b981", "#f59e0b"]

export function ChartsSection() {
  return (
    <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">
      {/* Student Growth Chart */}
      <div className="lg:col-span-2 glass-card-hover p-6 rounded-xl">
        <h3 className="text-lg font-semibold mb-4 text-foreground">Student Growth</h3>
        <ResponsiveContainer width="100%" height={300}>
          <LineChart data={studentGrowthData}>
            <CartesianGrid strokeDasharray="3 3" stroke="#1e2749" />
            <XAxis dataKey="year" stroke="#a1a5c8" />
            <YAxis stroke="#a1a5c8" />
            <Tooltip
              contentStyle={{
                backgroundColor: "#0f1436",
                border: "1px solid #1e2749",
                borderRadius: "8px",
              }}
              labelStyle={{ color: "#e8eaff" }}
            />
            <Line
              type="monotone"
              dataKey="students"
              stroke="#8b5cf6"
              strokeWidth={2}
              dot={{ fill: "#8b5cf6", r: 4 }}
              activeDot={{ r: 6 }}
            />
          </LineChart>
        </ResponsiveContainer>
      </div>

      {/* Major Distribution */}
      <div className="glass-card-hover p-6 rounded-xl">
        <h3 className="text-lg font-semibold mb-4 text-foreground">Major Distribution</h3>
        <ResponsiveContainer width="100%" height={300}>
          <PieChart>
            <Pie
              data={majorDistributionData}
              cx="50%"
              cy="50%"
              innerRadius={60}
              outerRadius={90}
              paddingAngle={5}
              dataKey="value"
            >
              {majorDistributionData.map((entry, index) => (
                <Cell key={`cell-${index}`} fill={COLORS[index % COLORS.length]} />
              ))}
            </Pie>
            <Tooltip
              contentStyle={{
                backgroundColor: "#0f1436",
                border: "1px solid #1e2749",
                borderRadius: "8px",
              }}
              labelStyle={{ color: "#e8eaff" }}
            />
          </PieChart>
        </ResponsiveContainer>
      </div>

      {/* Classes Per Grade */}
      <div className="lg:col-span-2 glass-card-hover p-6 rounded-xl">
        <h3 className="text-lg font-semibold mb-4 text-foreground">Classes per Grade</h3>
        <ResponsiveContainer width="100%" height={300}>
          <BarChart data={classesPerGradeData}>
            <CartesianGrid strokeDasharray="3 3" stroke="#1e2749" />
            <XAxis dataKey="grade" stroke="#a1a5c8" />
            <YAxis stroke="#a1a5c8" />
            <Tooltip
              contentStyle={{
                backgroundColor: "#0f1436",
                border: "1px solid #1e2749",
                borderRadius: "8px",
              }}
              labelStyle={{ color: "#e8eaff" }}
            />
            <Bar dataKey="classes" fill="#06b6d4" radius={[8, 8, 0, 0]} />
          </BarChart>
        </ResponsiveContainer>
      </div>
    </div>
  )
}
