"use client"

import {
  LineChart,
  Line,
  PieChart,
  Pie,
  Cell,
  BarChart,
  Bar,
  XAxis,
  YAxis,
  CartesianGrid,
  Tooltip,
  Legend,
  ResponsiveContainer,
} from "recharts"

const studentGrowthData = [
  { year: 2020, students: 450 },
  { year: 2021, students: 680 },
  { year: 2022, students: 890 },
  { year: 2023, students: 1050 },
  { year: 2024, students: 1247 },
]

const majorDistributionData = [
  { name: "Science", value: 380 },
  { name: "English", value: 290 },
  { name: "Math", value: 310 },
  { name: "History", value: 150 },
  { name: "Arts", value: 127 },
]

const classPerGradeData = [
  { grade: "10", classes: 8 },
  { grade: "11", classes: 9 },
  { grade: "12", classes: 7 },
  { grade: "13", classes: 6 },
]

const colors = ["#8b5cf6", "#06b6d4", "#10b981", "#f59e0b", "#ef4444"]

const CustomTooltip = ({ active, payload }) => {
  if (active && payload && payload.length) {
    return (
      <div className="glass-card p-2 rounded-lg border border-border/50">
        <p className="text-xs font-medium text-foreground">
          {payload[0].payload.name || payload[0].payload.year || payload[0].payload.grade}: {payload[0].value}
        </p>
      </div>
    )
  }
  return null
}

function ChartCard({ title, children }) {
  return (
    <div className="glass-card p-6 rounded-xl">
      <h3 className="text-lg font-semibold mb-6">{title}</h3>
      <div className="w-full h-80">{children}</div>
    </div>
  )
}

export default function ChartsSection() {
  return (
    <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
      {/* Line Chart */}
      <ChartCard title="Student Growth Over Years">
        <ResponsiveContainer width="100%" height="100%">
          <LineChart data={studentGrowthData} margin={{ top: 5, right: 30, left: 0, bottom: 5 }}>
            <defs>
              <linearGradient id="gradientLine" x1="0" y1="0" x2="0" y2="1">
                <stop offset="5%" stopColor="#8b5cf6" stopOpacity={0.8} />
                <stop offset="95%" stopColor="#8b5cf6" stopOpacity={0} />
              </linearGradient>
            </defs>
            <CartesianGrid strokeDasharray="3 3" stroke="rgba(139,92,246,0.1)" />
            <XAxis dataKey="year" stroke="rgba(255,255,255,0.3)" />
            <YAxis stroke="rgba(255,255,255,0.3)" />
            <Tooltip content={<CustomTooltip />} />
            <Line
              type="monotone"
              dataKey="students"
              stroke="#8b5cf6"
              strokeWidth={3}
              dot={{ fill: "#8b5cf6", r: 6 }}
              activeDot={{ r: 8 }}
              fill="url(#gradientLine)"
            />
          </LineChart>
        </ResponsiveContainer>
      </ChartCard>

      {/* Pie Chart */}
      <ChartCard title="Student Distribution by Major">
        <ResponsiveContainer width="100%" height="100%">
          <PieChart>
            <Pie
              data={majorDistributionData}
              cx="50%"
              cy="50%"
              innerRadius={60}
              outerRadius={100}
              paddingAngle={2}
              dataKey="value"
            >
              {majorDistributionData.map((entry, index) => (
                <Cell key={`cell-${index}`} fill={colors[index % colors.length]} />
              ))}
            </Pie>
            <Tooltip content={<CustomTooltip />} />
            <Legend />
          </PieChart>
        </ResponsiveContainer>
      </ChartCard>

      {/* Bar Chart - Full Width */}
      <ChartCard title="Classes per Grade">
        <ResponsiveContainer width="100%" height="100%">
          <BarChart data={classPerGradeData} margin={{ top: 5, right: 30, left: 0, bottom: 5 }}>
            <CartesianGrid strokeDasharray="3 3" stroke="rgba(139,92,246,0.1)" />
            <XAxis dataKey="grade" stroke="rgba(255,255,255,0.3)" />
            <YAxis stroke="rgba(255,255,255,0.3)" />
            <Tooltip content={<CustomTooltip />} />
            <Bar dataKey="classes" fill="#06b6d4" radius={[8, 8, 0, 0]} animationDuration={1000} />
          </BarChart>
        </ResponsiveContainer>
      </ChartCard>
    </div>
  )
}
